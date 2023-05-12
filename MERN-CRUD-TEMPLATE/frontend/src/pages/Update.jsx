import axios from 'axios'
import React from 'react'
import { useState } from 'react'
import { useLocation, useNavigate } from 'react-router-dom'

const Update = () => {

  const [cat, setCat] = useState({   
    name: "",
    race: "",
    age: null,
    weight: null,
    photo: ""
  })

  const location = useLocation();   
  const nav = useNavigate();
  const catId = location.pathname.split("/")[2]; 

  const handleChange = (e) => {
    setCat((prev) => ({ ...prev, [e.target.name]: e.target.value }));     
  };

  const handleClick = async (e) => {   
    e.preventDefault();

    try {
      await axios.put(`http://localhost:8800/cats/${catId}`, cat);
      nav("/");
    } catch (err) {
      console.log(err);
    }
  };

  return (
    <div className='updateForm'>
      <h1>Update the cat</h1>
      <input type="text" placeholder='name' onChange={handleChange} name='name'/>
      <input type="text" placeholder='race' onChange={handleChange} name='race'/>
      <input type="number" placeholder='age' onChange={handleChange} name='age'/>
      <input type="number" placeholder='weight' onChange={handleChange} name='weight'/>
      <input type="text" placeholder='photo' onChange={handleChange} name='photo'/>

      <button onClick={handleClick}>Update</button>
    </div>
  )
}

export default Update