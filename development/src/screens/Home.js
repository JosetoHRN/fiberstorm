import React from "react";
import { Link } from "react-router-dom";

import Header from "../components/Header";
import '../assets/css/home.css';
import corte from '../assets/img/corte.png';
import costura from '../assets/img/costura.png';
import inventario from '../assets/img/inventario.png';

const Area = ({path, text, icon}) => {
    return (
    <Link to={path}>
        <div className="avatar">
            <img src={icon} alt={text}/>
        </div>
        <p>{text}</p>
    </Link>);
}

export default function Home() {

    const user = localStorage.getItem('user');
    const user_json = JSON.parse(user);

    return (
        <>
            <Header area=""/>
            <main>
                <div className="home_container">
                    <h3>Seleccione su área de trabajo</h3>
                    <div className="area_container">
                        <Area path="/home/inventario" text="Inventario" icon={inventario}/>
                        <Area path="/home/corte" text="Corte" icon={corte}/>
                        <Area path="/home/costura" text="Costura" icon={costura}/>
                    </div>
                </div>
            </main>
        </>
    );
}
