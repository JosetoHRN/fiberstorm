import React, { useEffect, useState } from "react";
import {apiEndpoint} from '../config/apiEndpoint';
import Header from "../components/Header";
import Table from "../components/Table";

// const DATA = [
//   {id: 1, name: "Jose", company: "Capgeminy", time: "04/03/2023, 12:26:30"},
//   {id: 2, name: "Laura", company: "Soltech", time: "04/03/2021, 12:26:30"},
//   {id: 3, name: "Paco", company: "Capgeminy", time: "01/03/2023, 12:26:30"},
//   {id: 4, name: "Almudena", company: "IrisTC", time: "28/01/2023, 10:26:30"},
//   {id: 5, name: "Lucia", company: "IrisTC", time: "28/01/2023, 12:26:00"},
//   {id: 6, name: "Alberto", company: "Everis", time: "28/01/2023, 12:25:00"},
//   {id: 7, name: "Juan", company: "Babcock", time: "26/01/2023, 12:25:30"},
//   {id: 8, name: "Pedro", company: "Soltech", time: "28/01/2022, 12:26:30"},
//   {id: 9, name: "Carla", company: "Babcock", time: "28/01/2023, 11:26:30"},
// ];

export default function Inventario() {
  const [inventory, setInventory] = useState('');

  useEffect(() => {
    fetch(`${apiEndpoint}/inventario/get.php`,{
      method:'GET',
      withCredentials: true,    
      crossorigin: true,    
      mode: 'no-cors',
      headers:{
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    })
    .then(res =>  res.json())
    .then(data => {
      console.log(data);
      // setInventory(data.json());
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
        <Table data={inventory} />
      </main>
    </>
  );
}
