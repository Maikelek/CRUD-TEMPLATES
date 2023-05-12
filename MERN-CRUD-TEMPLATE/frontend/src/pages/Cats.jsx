import React from 'react'
import { useEffect } from 'react'
import { useState } from 'react'
import axios from "axios"
import { Link } from 'react-router-dom'

const Cats = () => {

    const [cats, setCats] = useState ( [] )

    useEffect( () => {               
        const fetchAllCats = async () => {
            try{
                const res = await axios.get("http://localhost:8800/cats")
                setCats(res.data)
            }catch(error) {
                console.log(error)
            }
        }
        fetchAllCats()
    },[])

    const handleDelete = async (id) => {          
        try {
          await axios.delete(`http://localhost:8800/cats/` + id);
          window.location.reload()
        } catch (err) {
          console.log(err);
        }
      };

    return (
        <div>
            <h1>CATS</h1>
            <div className='cats'>
                {cats.map(cat => (
                    <div className="cat" key={cat.id}>
                        {cat.photo && <img src={cat.photo} alt="cat"/>}
                        <h2>{cat.name}</h2>
                        <p>Race: {cat.race}</p>
                        <p>Cat age: {cat.age} years</p>
                        <p>cat weight: {cat.weight}kg</p>
                        <button className='update'><Link to={`/update/${cat.id}`}>Update</Link></button>
                        <button className='remove' onClick={() => handleDelete(cat.id)}>Remove</button>
                    </div>
                ))}
            </div>
            <button className='addButton'>
                <Link to="/add">ADD A NEW CAT</Link>
            </button>
        </div>
    )
}

export default Cats