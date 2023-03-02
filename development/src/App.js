import React from "react";
import { Routes, Route, BrowserRouter } from "react-router-dom";
import { AuthContextProvider } from "./config/authContext";
import PublicRoute from './components/router/PublicRoute';
import PrivateRoute from './components/router/PrivateRoute';

import './App.css';
import Home from './screens/Home';
import Login from './screens/Login';
import Logout from './screens/Logout';

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
            <Route path="/home/logout" element={<Logout />}/>
          </Route>
        </Routes>
      </BrowserRouter>
    </AuthContextProvider>
  );
}

export default App;
