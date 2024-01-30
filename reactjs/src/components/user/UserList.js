import React, { useEffect, useState } from 'react'
import UserTable from '../Table/UserTable';
import requestApi from '../../helpers/Api';
import {useDispatch} from 'react-redux'
import * as actions from '../../redux/actions'
const UserList = () => {
    const dispatch= useDispatch();
    const[user,setUser] = useState([])
    const[numOfPage,setNumofPage] = useState(1)
    const[currentPage, setCurrentPage] = useState(1)
    const[itemsPerPage, setItemsPerPage] = useState(1)
    const[searchString,setSearchString] = useState('')
    const [selectedRows,setSelectedRows] = useState([])
    const[deleteItem,setDeleteItem] = useState(null)
    const[deleteType,setDeleteType] = useState('single')

    const columns = [
        {
            name:"ID",
            element: row=>row.id
        },
        {
            name:"First name",
            element: row=>row.first_name
        },
        {
            name:"Last name",
            element: row=>row.last_name
        },
        {
            name:"Email",
            element: row=>row.email
        },
        {
            name:"Status",
            element: row=>row.status
        },
        {
            name:"Created at",
            element: row=>row.created_at
        },
        {
            name:"Updated at",
            element: row=>row.updated_at
        },
        {
            name:"Actions",
            element: row  =>(
                <>
                    <button type="button" className="btn btn-sm btn-warning me-1"><i className="fa fa-pencil"></i> Edit</button>
                    <button type='button' className='btn btn-sm btn-danger me-1' onClick={()=> handleDelete(row.id)}><i className='fa fa-trash'></i> Delete</button>
                </>
            )
        }
    ]
    const handleDelete = (id)=>{
        console.log('single delete with id =>',id)
    }

    useEffect(()=>{
        dispatch(actions.controlLoading(true))
        let query= `?items_per_page=${itemsPerPage}&page=${currentPage}&search=${searchString}`
        requestApi(`/user${query}`,'GET',[]).then(response=>{
            console.log('respone=>',response)
            setUser(response.data.data)
            setNumofPage(response.data.lastPage)
            dispatch(actions.controlLoading(false))
        }).catch(err=>{
            console.log(err)
            dispatch(actions.controlLoading(false))
        })

    },[currentPage,itemsPerPage,searchString])
    return (
        <div id="layoutSidenav_content">
            <main>
                <div className="container-fluid px-4">
                    <h1 className="mt-4">Tables</h1>
                    <ol className="breadcrumb mb-4">
                        <li className="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li className="breadcrumb-item active">Tables</li>
                    </ol>
                    <div className='mb-3'>
                        <button type='button' className='btn btn-sm btn-success me-2'><i className='fa fa-plus'></i>Add new</button>
                        {selectedRows.length > 0 && <button type='button' className='btn btn-sm btn-danger'><i className='fa fa-trash'></i>Delete</button>}
                        
                    </div>
                    <UserTable 
                    name="List Users"
                    data={user}
                    columns={columns}
                    numOfPage={numOfPage}
                    currentPage={currentPage}
                    onPageChange={setCurrentPage}
                    onChangeItemsPerPage={setItemsPerPage}
                    onKeySearch={(keyword) =>{
                        
                        console.log('keyword in user list comp=>',keyword)
                        setSearchString(keyword)
                    }}
                    onSelectedRows = {rows => {
                        console.log('selected row in uselist=>',rows)
                        setSelectedRows(rows)
                    }}
                    />
                  
                </div>
            </main>

        </div>

    )
}
export default UserList;