import React from 'react';
import '../assets/css/table.css';
import search from '../assets/img/search.png';

export default function List({data}) {
    if(!data || data.length===0){
        return (<p>No hay inventario para mostrar...</p>);
    }
    const keys = Object.keys(data[0]);

    const Item = ({itemData}) => (
        Object.values(itemData).map((value, i) => (
            <p key={i}>{value}</p>
        ))
    );

    return (
        <>
        <section className='tableOptions'>
          <div className='searchBar'>
            <input type="search" placeholder='Búsqueda'/>
            <img src={search} alt="icono lupa"/>
          </div>
          <div className='sortBy'>
            <label htmlFor='sortBy'>Ordenar por:</label>
            <select name='sortBy'>
                <option value="1">Uno</option>
                <option value="2">Dos</option>
            </select>
          </div>
        </section>
        <div>
            <b>
                {keys.map((value) => (<span key={value}>{value}</span>))}
            </b>
        </div>
        <ul>
            {data.map((item)=>(
                <li key={item.id}>
                    <Item itemData={item} />
                </li>
            ))}
        </ul>
        </>
    );
}
