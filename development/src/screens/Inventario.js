import React, { useEffect, useState } from "react";
import {apiEndpoint} from '../config/apiEndpoint';
import Header from "../components/Header";
import Table from "../components/Table";

export default function Inventario() {
  const [inventory, setInventory] = useState('');

  useEffect(() => {
    fetch(`./getInventario.php`,{
      method:'GET',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    })
    .then(response => {
      console.log('response: ',response);
      response.json();
    })
    .then(data => {
      console.log('data: ',data);
      setInventory(data);
    })
    .catch(error => {
      console.log('error: ',error);
    });
  },[]);

  return (
    <>
      <Header area="Inventario"/>
      <main>
        <button className="primary">Crear modelo</button>
        <button className="primary">Añadir inventario</button>
        <Table data={inventory} />
      </main>
    </>
  );
}
