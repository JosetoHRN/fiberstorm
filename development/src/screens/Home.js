import React from "react";
import { Link } from "react-router-dom";

function Home(props) {
    console.log('props :>> ', props);
    return (
        <div>
            <p>Home</p>
            <Link to="/home/logout">Cerrar sesión</Link>
        </div>
    );
}
  
export default Home;