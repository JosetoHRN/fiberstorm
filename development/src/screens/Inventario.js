import React from "react";
import Header from "../components/Header";
import Table from "../components/Table";

export default function Inventario(){
  return (
    <>
      <Header area="Inventario"/>
      <main>
        <button className="primary">Crear modelo</button>
        <button className="primary">Añadir inventario</button>
        <Table name="Inventario" />
      </main>
    </>
  );
}
