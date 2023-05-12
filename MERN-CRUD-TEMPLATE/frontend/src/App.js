import {BrowserRouter,Routes,Route,} from "react-router-dom";
import Add from "./pages/Add";
import Cats from "./pages/Cats"
import Update from "./pages/Update";
import "./App.css"

function App() {
  return ( // React Router
    <div className="App">
      <BrowserRouter>  
        <Routes>
          <Route path="/" element={<Cats/>}/>
          <Route path="/add" element={<Add/>}/>
          <Route path="/update/:id" element={<Update/>}/>
        </Routes>
      </BrowserRouter>
    </div>
  );
}

export default App;
