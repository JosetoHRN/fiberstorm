import React, { useEffect, useState } from "react";
import Header from "../components/Header";
import Table from "../components/Table";

const DATA = [
    {id: 1, name: "Jose", company: "Capgeminy"},
    {id: 2, name: "Laura", company: "Soltech"},
    {id: 3, name: "Paco", company: "Capgeminy"},
    {id: 4, name: "Almudena", company: "IrisTC"},
];

export default function Inventario() {

  const [inventory, setInventory] = useState(null);

  useEffect(() => {
    setInventory(DATA);
  }, []);
  // useEffect(() => {
  //   fetch('http://api.gomaespumaycojines.es/getInventory.php',{
  //     method:'GET',
  //     withCredentials: true,    
  //     crossorigin: true,    
  //     mode: 'no-cors',
  //     headers:{
  //       'Accept': 'application/json',
  //       'Content-Type': 'application/json'
  //     }
  //   })
  //   .then(res => res.json())
  //   .then(data => {
  //     console.log(data);
  //     setInventory(data);
  //   })
  //   .catch(error => {
  //     console.log(error);
  //   });
  // },[]);

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
