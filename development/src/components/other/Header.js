import React from "react";
import { Link } from "react-router-dom";

export default function Header({user}) {
    const user_json = JSON.parse(user);
    return (
        <nav>
            <p>Bienvenido, {user_json.username}.</p>
            <Link to="/home/logout" className="secondary">Cerrar sesión</Link>
        </nav>
    );
}
