import React, { useEffect, useState } from "react";
import {apiEndpoint} from '../config/apiEndpoint';
import Header from "../components/Header";
import Table from "../components/Table";

export default async function Inventario() {
  const [inventory, setInventory] = useState([]);

  useEffect(() => {
    const customFetch = async() =>{
      let response = await fetch('../getInventario.php');
      const reader = response.body.getReader();
      // Paso 2: obtener la longitud total
      const contentLength = +response.headers.get('Content-Length');
      // Paso 3: leer los datos
      let receivedLength = 0; // cantidad de bytes recibidos hasta el momento
      let chunks = []; // matriz de fragmentos binarios recibidos (comprende el cuerpo)
      while(true) {
        const {done, value} = await reader.read();
        if (done) {
          break;
        }
        chunks.push(value);
        receivedLength += value.length;
      }
      // Paso 4: concatenar fragmentos en un solo Uint8Array
      let chunksAll = new Uint8Array(receivedLength); // (4.1)
      let position = 0;
      for(let chunk of chunks) {
        chunksAll.set(chunk, position); // (4.2)
        position += chunk.length;
      }
      // Paso 5: decodificar en un string
      let result = new TextDecoder("utf-8").decode(chunksAll);
      // ¡Hemos terminado!
      let json_result = JSON.parse(result);
      console.log('json_result :>> ', json_result);
      return json_result;
    }
    const data = customFetch();
    setInventory(data);
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
