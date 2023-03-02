import React from "react";
import { Routes, Route, BrowserRouter } from "react-router-dom";
import { AuthContextProvider } from "./config/authContext";
import PublicRoute from './components/router/PublicRoute';
import PrivateRoute from './components/router/PrivateRoute';

import './App.css';
import Home from './screens/Home';
import Login from './screens/Login';
import Logout from './screens/Logout';
import Inventario from './screens/Inventario';
import Corte from './screens/Corte';
import Costura from './screens/Costura';

function App() {
  return (
    <AuthContextProvider>
      <BrowserRouter>
        <Routes>
          {/* Rutas publicas */}
          <Route path="/" element={<PublicRoute />}>
            <Route index element={<Login />}/>
            <Route path="*" element={<Login />}/>
          </Route>
          {/* Rutas privadas */}
          <Route path="/home" element={<PrivateRoute />}>
            <Route index element={<Home />}/>
            <Route path="/home/inventario" element={<Inventario />}/>
            <Route path="/home/corte" element={<Corte />}/>
            <Route path="/home/costura" element={<Costura />}/>
            <Route path="/home/logout" element={<Logout />}/>
          </Route>
        </Routes>
      </BrowserRouter>
    </AuthContextProvider>
  );
}

export default App;
