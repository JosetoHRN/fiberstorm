import React, { useEffect, useState } from "react";
import Header from "../components/Header";
import Table from "../components/Table";

export default function Inventario() {

  const [inventory, setInventory] = useState(null);

  useEffect(() => {
    fetch('http://api.gomaespumaycojines.es/getInventory.php',{
      method:'GET',
      withCredentials: true,    
      crossorigin: true,    
      mode: 'no-cors',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    })
    .then(res => res.json())
    .then(data => {
      console.log(data);
      setInventory(data);
    })
    .catch(error => {
      console.log(error);
    });
  },[]);

  return (
    <>
      <Header area="Inventario"/>
      <main>
        <button className="primary">Crear modelo</button>
        <button className="primary">Añadir inventario</button>
        <div>
          <div>
            <p>Búsqueda rápida:</p>
            <input type="search" />
          </div>
          <div>
            <p>Ordenar por:</p>
            {/*  */}
          </div>
        </div>
        <Table data={inventory} />
      </main>
    </>
  );
}
