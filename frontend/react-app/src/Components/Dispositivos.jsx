/* eslint-disable no-unused-vars */
import { useState, useEffect } from 'react';
import { Grid, FormControl, InputLabel, Select, MenuItem, Table, TableBody, TableCell, TableHead, TableRow } from '@mui/material';
import axios from 'axios';



const Dispositivos = () => {
    const [bodegas, setBodegas] = useState([]);
    const [marcas, setMarcas] = useState([]);
    const [modelos, setModelos] = useState([]);
    const [dispositivos, setDispositivos] = useState([]);

    const [filtroBodega, setFiltroBodega] = useState('');
    const [filtroMarca, setFiltroMarca] = useState('');
    const [filtroModelo, setFiltroModelo] = useState('');


    useEffect(() => {
        fetchBodegas();
        fetchMarcas();
        fetchModelos();
        fetchDispositivos();

    }, []);

    const fetchBodegas = async () => {
        try {
            const response = await axios.get(
                `http://localhost:8000/api/bodegas`
            );
            setBodegas(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    const fetchDispositivosByBodega = async (bodegaId) =>{
        try {
            const response = await axios.get(
                `http://localhost:8000/api/bodega/${bodegaId}/dispositivos`
            );
            setDispositivos(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    const fetchMarcas = async () => {
        try {
            const response = await axios.get(
                `http://localhost:8000/api/marcas`
            );
            setMarcas(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    const fetchDispositivosByMarca = async (marcaId) =>{
        if (!marcaId) return;
        try {
            const response = await axios.get(
                `http://localhost:8000/api/marcas/${marcaId}/dispositivos`
            );
            setDispositivos(response.data);
        } catch (error) {
            console.error(error);
        }
    }

    const fetchModelos = async (marcaId) => {
        if(!marcaId) return;
        try {
            const response = await axios.get(
                `http://localhost:8000/api/marcas/${marcaId}/modelos`
            );
            setModelos(response.data);
        } catch (error) {
            console.error(error);
        }
    };
    
    const fetchDispositivosByModelo = async (marcaId, modeloId) => {
        if (!modeloId) return;
        try {
            const response = await axios.get(
                `http://localhost:8000/api/marcas/${marcaId}/modelos/${modeloId}/dispositivos`
            );
            setDispositivos(response.data);
        } catch (error) {
            console.error(error);
        }
    }

    const fetchDispositivos = async () => {
        try {
            const response = await axios.get(
                "http://localhost:8000/api/dispositivos"
            );
            setDispositivos(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    useEffect(() => {
        if (filtroBodega !== ''){
            fetchDispositivosByBodega(filtroBodega)
        } else {
            fetchDispositivos();
        }
    }, [filtroBodega]);

    useEffect(() => {
        if (filtroMarca !== ''){
            fetchDispositivosByMarca(filtroMarca);
            fetchModelos(filtroMarca);
        } else {
            setModelos([])
            fetchDispositivos();
        }
    }, [filtroMarca]);

    useEffect(() => {
        if (filtroModelo !== '') {
            fetchDispositivosByModelo(filtroMarca, filtroModelo);
        } else {
            if (filtroMarca !== '') {
                fetchDispositivosByMarca(filtroMarca);
            }
            fetchDispositivos();
        }
    }, [filtroModelo, filtroMarca]);
    


    const handleBodegaChange = (event) => {
        setFiltroBodega(event.target.value);
    };

    const handleMarcaChange = (event) => {
        const marcaSeleccionada = event.target.value;
        setFiltroMarca(marcaSeleccionada);
        if (marcaSeleccionada !== ''){
            fetchModelos(marcaSeleccionada);
        } else {
            setModelos([]);
            setFiltroModelo("")
        }
    };

    const handleModeloChange = (event) => {
        setFiltroModelo(event.target.value);
    };

    const dispositivosFiltrados = dispositivos.filter(
        (dispositivo) => 
            (filtroBodega === '' || (dispositivo.bodega && dispositivo.bodega.id === parseInt(filtroBodega))) &&
            (filtroMarca === '' || (dispositivo.modelo && dispositivo.modelo.marca.id === parseInt(filtroMarca))) &&
            (filtroModelo === '' || (dispositivo.modelo && dispositivo.modelo.id === parseInt(filtroModelo)))
    );

    
    return (
        <>
        <h2>Dispositivos almacenados</h2>
            <div>
            <Grid container spacing={3}>
                <Grid item xs={12} sm={4}>
                    <FormControl fullWidth>
                        <InputLabel>Bodega</InputLabel>
                        <Select value={filtroBodega} onChange={handleBodegaChange}>
                            <MenuItem value="">
                                <em>{filtroBodega ? "Bodega no seleccionada" : "Todas"}</em>
                            </MenuItem>
                            {bodegas.map((bodega) => (
                                <MenuItem key={bodega.id} value={bodega.id}>
                                    {bodega.nombre}
                                </MenuItem>
                            ))}
                        </Select>
                    </FormControl>
                </Grid>
                <Grid item xs={12} sm={4}>
                    <FormControl fullWidth>
                        <InputLabel>Marca</InputLabel>
                        <Select value={filtroMarca} onChange={handleMarcaChange} disabled={!filtroBodega}>
                            <MenuItem value="">
                                <em>Todas</em>
                            </MenuItem>
                            {marcas.map((marca) => (
                                <MenuItem key={marca.id} value={marca.id}>
                                    {marca.nombre}
                                </MenuItem>
                            ))}
                        </Select>
                    </FormControl>
                </Grid>
                
                <Grid item xs={12} sm={4}>
                    <FormControl fullWidth>
                        <InputLabel>Modelo</InputLabel>
                        <Select value={filtroModelo} onChange={handleModeloChange} disabled={!filtroMarca}>
                            <MenuItem value="">
                                <em>Todos</em>
                            </MenuItem>
                            {modelos.map((modelo) => (
                                <MenuItem key={modelo.id} value={modelo.id}>
                                    {modelo.nombre_modelo}
                                </MenuItem>
                            ))}
                        </Select>
                    </FormControl>
                </Grid>
            </Grid>
                <Table>
                    <TableHead>
                        <TableRow>
                            <TableCell>ID</TableCell>
                            <TableCell>Nombre</TableCell>
                            <TableCell>Marca</TableCell>
                            <TableCell>Modelo</TableCell>
                            <TableCell>Bodega</TableCell>
                        </TableRow>
                    </TableHead>
                    <TableBody>
                        {dispositivosFiltrados.map((dispositivo) => (
                        <TableRow key={dispositivo.id}>
                            <TableCell>{dispositivo.id}</TableCell>
                            <TableCell>{dispositivo.nombre}</TableCell>
                            <TableCell>{dispositivo.modelo ? dispositivo.modelo.marca.nombre : 'N/A'}</TableCell>
                            <TableCell>{dispositivo.modelo ? dispositivo.modelo.nombre_modelo : 'N/A'}</TableCell>
                            <TableCell>{dispositivo.bodega ? dispositivo.bodega.nombre : 'N/A'}</TableCell>
                        </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </div>
        </>
    );
}

export default Dispositivos