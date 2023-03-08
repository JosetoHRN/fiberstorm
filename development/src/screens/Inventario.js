import React, { useEffect, useState } from "react";
import axios from 'axios';
import Header from "../components/Header";
import Table from "../components/Table";

export default function Inventario(){
  const [inventory, setInventory] = useState('');

  useEffect(() => {
    axios.get('../getInventario.php').then((response) => {
      console.log('response :>> ', response);
      console.log('response.data :>> ', response.data);
      // setInventory(response.data);
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
