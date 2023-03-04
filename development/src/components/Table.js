import React, { useState, useEffect } from 'react';
import '../assets/css/table.css';
import searchIcon from '../assets/img/search.png';

const Item = ({itemData}) => (
    Object.values(itemData).map((value, i) => (
        <p key={i}>{value}</p>
    ))
);

export default function List({data}) {
    const keys = Object.keys(data[0]);

    const [arr,setArr] = useState(data);
    const [searchValue, setSearchValue] = useState('');
    const [sortValue, setSortValue] = useState('id');
    const [filteredData, setFilteredData] = useState(arr);

    useEffect(() => {
        setFilteredData(arr);
    }, [arr]);

    useEffect(() => {
        const filtered = arr.filter(obj => 
            Object.values(obj).some(value => 
                String(value).toLowerCase().includes(searchValue.toLowerCase())
            )
        );
        const sorted = filtered.sort((a, b) => {
            if(sortValue === 'time'){
                const timeA = Date.parse(a.time);
                const timeB = Date.parse(b.time);
                console.log('timeA, timeB :>> ', timeA, timeB);
                return timeB - timeA;
            }else{
                if (a[sortValue] < b[sortValue]) return -1;
                if (a[sortValue] > b[sortValue]) return 1;
                return 0;
            }
            
        });
        setFilteredData(sorted);
    }, [arr, searchValue, sortValue]);

    
    if(!data || data.length===0){
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
            {filteredData.map((item)=>(
                <li key={item.id}>
                    <Item itemData={item} />
                </li>
            ))}
        </ul>
        </>
    );
}
