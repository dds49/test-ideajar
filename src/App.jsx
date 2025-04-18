import React from "react";
import "./App.css";
import Jar from "./data/jar.json";
import addIdea from "./functions/addIdea";
function App() {
  return (
    <>
      <div></div>
      <h1>IDEAS JAR</h1>

      <button className="result-btn" onClick={() => addIdea()}>
        {" Add Idea "}
      </button>

      <div className="card">
        {Jar.map((idea, index) => (
          <div className="card-item" key={index}>
            <h2>{idea.id}</h2>
            <p>{idea.description}</p>
          </div>
        ))}
      </div>
      <p className="read-the-docs"></p>
    </>
  );
}

export default App;
