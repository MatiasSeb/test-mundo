/* eslint-disable react-hooks/exhaustive-deps */
/* eslint-disable no-unused-vars */

import { BrowserRouter, Routes, Route} from "react-router-dom";
import Dispositivos from "./Components/Dispositivos";

//import './App.css'

function App() {
  return(
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Dispositivos/>}/>
      </Routes>
    </BrowserRouter>
  );
}

export default App
