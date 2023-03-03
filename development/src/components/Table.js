import { React } from 'react';

export default function List({data}) {
    if(!data || data.length===0){
        return (<p>No hay inventario para mostrar...</p>);
    }
    return (
        <table>
            <thead>
                <tr>
                    {/* {data.map((text, id) => <th key={id} >{text}</th>)} */}
                    {Object.keys(data).map((item) => (
                        <th>{item}</th>
                    ))}
                </tr>
            </thead>
            <tbody>
                {data.map((item) => (
                    <tr key={item.id}>
                        {item.map((value) => (<td>{value}</td>))}
                    </tr>
                ))}
            </tbody>
        </table>
    );
}
