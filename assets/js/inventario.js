const formPOST = document.getElementById('POST_form');
const buttonPOST = document.getElementById('postInventario');
buttonPOST.addEventListener('click', () => {
    formPOST.style.display = 'block';
});

const closeForm = document.getElementsByClassName('closeForm');
for(let i=0; i<closeForm.length; i++){
    closeForm[i].addEventListener('click', (e) => {
        e.target.parentNode.parentNode.parentNode.style.display='none';
    });
}


const tableHeader = document.getElementById('tableHeader');
const tableContent = document.getElementById('tableContent');

const getData = async () => {
    // Set loading
    fetch('../php/inventario/getAll.php',{
        method: 'GET',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Table heading
        const keys = Object.keys(data[0]);
        keys.map((value) => {
            if(value != 'id'){
                let header = document.createElement('p');
                header.innerText = value;
                tableHeader.appendChild(header);
            }
        });
        let header = document.createElement('p');
        header.innerText = 'Acciones';
        tableHeader.appendChild(header);
        // Table content
        data.map((item) => {
            let row = document.createElement('li');
            row.id = "inventario-"+item.id;
            Object.values(item).map((value,index) => {
                if(index != 0){
                    if(value.includes('.png') || value.includes('.jpg') || value.includes('.jpeg')){
                        let img = document.createElement('img');
                        img.alt = value;
                        img.src = '../assets/img/inventario/'+value;
                        row.appendChild(img);
                    }else if(index == 5){
                        let data = document.createElement('p');
                        data.innerText = value;
                        data.classList.add(`importancia`);
                        data.classList.add(`importancia-${value.toLowerCase()}`);
                        row.appendChild(data);
                    }else{
                        let data = document.createElement('p');
                        data.innerText = value;
                        row.appendChild(data);
                    }
                }
            });
            // Append actions
            let data = document.createElement('p');
            data.innerHTML = '<div class="tableActions"><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" onclick="modifyItem('+item.id+')"><path d="M5.15 19H6.4l9.25-9.25-1.225-1.25-9.275 9.275Zm13.7-10.35L15.475 5.3l1.3-1.3q.45-.425 1.088-.425.637 0 1.062.425l1.225 1.225q.425.45.45 1.062.025.613-.425 1.038Zm-1.075 1.1L7.025 20.5H3.65v-3.375L14.4 6.375Zm-2.75-.625-.6-.625 1.225 1.25Z"/></svg><svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" fill="tomato" onclick="deleteItem('+item.id+')"><path d="M7.3 20.5q-.75 0-1.275-.525Q5.5 19.45 5.5 18.7V6h-1V4.5H9v-.875h6V4.5h4.5V6h-1v12.7q0 .75-.525 1.275-.525.525-1.275.525ZM17 6H7v12.7q0 .125.088.213.087.087.212.087h9.4q.1 0 .2-.1t.1-.2ZM9.4 17h1.5V8H9.4Zm3.7 0h1.5V8h-1.5ZM7 6V19v-.3Z"/></svg></div>';
            row.appendChild(data);
            tableContent.appendChild(row);
        });
        
    })
    .catch(err => console.log('err :>> ', err))
    .finally(()=> {
        //Remove loading
        console.log('finally');
        addEventsTable();
    });
};

getData();

const modifyItem = (id) =>{
    // Show put form and submit fetch
    console.log('modify item: ', id);
};

const deleteItem = (id) =>{
    let text = "¿Desea eliminar este objeto del inventario?";
    if (confirm(text) == true) {
        // fetch delete method
        console.log('deleted item :>> ', id);
    }
};

const searchBar = document.getElementById('searchBar');
searchBar.addEventListener('input', (e) => {
    const searchTerm = e.target.value.toLowerCase();
    const rows = tableContent.getElementsByTagName('li');
    for(let i=0; i<rows.length; i++){
        const children = rows[i].children;
        let arr = [];
        for(let j=0; j<children.length; j++){
            arr.push(children[j].innerText.toLowerCase())
        }
        let is = 0;
        arr.map(text => { if(text.includes(searchTerm)) is = 1; });
        if(is){
            rows[i].style.display='flex';
        }else{
            rows[i].style.display='none';
        }
    }
});

const sortBy = document.getElementById('sortBy');
sortBy.addEventListener('change', (e) => {
    const sortTerm = e.target.value;
    const rows = tableContent.getElementsByTagName('li');
    const newRows = [];
    for(let i=0; i<rows.length; i++){
        const children = rows[i].children;
        let arr = [];
        for(let j=0; j<children.length; j++){
            arr.push(children[j].innerText.toLowerCase())
        }
        newRows.push(arr);
    }
    newRows.sort((a,b) => {
        const aValue = a[sortTerm];
        const bValue = b[sortTerm];
        if (aValue < bValue) {
            return -1;
        }
        if (aValue > bValue) {
            return 1;
        }
        return 0;
    });
    
    // Actualizar filas de la tabla en función del orden de newRows
    for(let i=0; i<newRows.length; i++){
        const newRow = newRows[i];
        for(let j=0; j<rows.length; j++){
            const children = rows[j].children;
            let match = true;
            for(let k=0; k<newRow.length; k++){
                const cellValue = newRow[k];
                const cellContent = children[k].innerText.toLowerCase();
                if(cellValue !== cellContent){
                    match = false;
                    break;
                }
            }
            if(match){
                // Si las celdas coinciden, actualizamos la posición de la fila
                tableContent.insertBefore(rows[j], rows[i]);
                break;
            }
        }
    }
});

function addEventsTable(){
    // Images
    const imgs = document.getElementById('tableContent').getElementsByTagName('img');
    for(let i=0; i<imgs.length; i++){
        console.log('imgs[i] :>> ', imgs[i]);
        imgs[i].addEventListener('click', (e)=>{
            const url = imgs[i].src;
            console.log('url :>> ', url, e);
        });
    }

}
