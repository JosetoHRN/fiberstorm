import React, { useState, useEffect } from 'react';
import axios from 'axios';
import '../assets/css/table.css';
import searchIcon from '../assets/img/search.png';

const Item = ({itemData}) => (
    Object.values(itemData).map((value, i) => (
        <p key={i}>{value}</p>
    ))
);

export default function List({name}) {
    const [keys, setKeys] = useState([]);
    const [allData, setAllData] = useState([]);
    const [data, setData] = useState([]);
    const [searchValue, setSearchValue] = useState('');
    const [sortValue, setSortValue] = useState('id');

    useEffect(() => {
        axios.get(`../get${name}.php`).then((response) => {
            console.log('response.data :>> ', response.data);
            setAllData(response.data);
            setData(response.data);
            setKeys(Object.keys(response.data[0]));
        });
    },[]);

    useEffect(()=>{
        if(searchValue.length>0){
            const filtered = allData.filter(item => {
                return `${item.modelo.toLowerCase()} ${item.tipo.toLowerCase()} ${item.importancia.toLowerCase()} ${item.estado.toLowerCase()}`.includes(searchValue.toLowerCase());
            });
            console.log('filtered :>> ', filtered);
            setData(filtered);
        }
    },[searchValue]);

    // useEffect(() => {
    //     const filtered = arr?.filter(obj => 
    //         Object.values(obj).some(value => 
    //             String(value).toLowerCase().includes(searchValue.toLowerCase())
    //         )
    //     );
    //     console.log('filtered :>> ', filtered);
    //     const sorted = filtered?.sort((a, b) => {
    //         if (a[sortValue] < b[sortValue]) return -1;
    //         if (a[sortValue] > b[sortValue]) return 1;
    //         return 0;
    //     });
    //     console.log('sorted :>> ', sorted);
    //     setFilteredData(sorted);
    // }, [arr, searchValue, sortValue]);

    
    if(!allData || allData.length===0){
        return (<p>No hay inventario para mostrar...</p>);
    }

    return (
        <>
        <section className='tableOptions'>
          <div className='searchBar'>
            <input type="text" id='searchBar' value={searchValue} placeholder='Búsqueda' onChange={(e) => setSearchValue(e.target.value)}/>
            <img src={searchIcon} alt="icono lupa"/>
          </div>
          <div className='sortBy'>
            <label htmlFor='sortBy'>Ordenar:</label>
            <select name='sortBy' id='sortBy' value={sortValue} onChange={(e) => setSortValue(e.target.value)}>
                {keys.map((key, index) => <option key={index} value={key}>{key}</option>)}
            </select>
          </div>
        </section>
        <div id='tableHeader'>
            <div>
                {keys.map((value) => (<span key={value}>{value}</span>))}
            </div>
        </div>
        <ul id='tableContent'>
            {data ? (data.map((item)=>(
                <li key={item.id}>
                    <Item itemData={item} />
                </li>
            ))) : <li>Ninguna coincidencia</li>}
        </ul>
        </>
    );
}
