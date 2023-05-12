import axios from 'axios'; 
import React from 'react';
import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

const Add = () => {

  const [cat, setCat] = useState({ 
    name: "",
    race: "",
    age: null,
    weight: null,
    photo: ""
  });

  const nav = useNavigate();

  const handleChange = (e) => {
    setCat(prev => ({...prev, [e.target.name]: e.target.value}));  
  };

  const handleClick = async e => {   
    e.preventDefault(); 

    try{
      await axios.post("http://localhost:8800/cats", cat); 
      nav("/"); 
    }catch(error) {
      console.log(error);  
    };
  }

  return (
    <div className='updateForm'>
      <h1>Add new cat</h1>
      <input type="text" placeholder='Name' onChange={handleChange} name='name'/>
      <input type="text" placeholder='Race' onChange={handleChange} name='race'/>
      <input type="number" placeholder='Age' onChange={handleChange} name='age'/>
      <input type="number" placeholder='Weight' onChange={handleChange} name='weight'/>
      <input type="text" placeholder='Photo' onChange={handleChange} name='photo'/>

      <button onClick={handleClick}>ADD</button>
    </div>
  )
}

export default Add;