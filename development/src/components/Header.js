import React from "react";
import { Link } from "react-router-dom";

export default function Header({area}) {
    const user = localStorage.getItem('user');
    const user_json = JSON.parse(user);
    return (
        <nav>
            <p>Bienvenido, {user_json.username}.</p>
            {area !== "" && (
                <div className="header_title">
                    <h1>{area}</h1>
                    <Link to="/home" style={{color: "var(--orange)", padding: 0}}>(cambiar área)</Link>
                </div>
            )}
            <Link to="/home/logout" className="secondary-light">Cerrar sesión</Link>
        </nav>
    );
}
