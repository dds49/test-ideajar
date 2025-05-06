import React from "react";
import { useState } from "react";
import axios from "axios";
//import { Circles } from "react-loader-spinner";

import "./App.css";
import ListIdeas from "./components/ListIdeas";
import ViewIdea from "./components/ViewIdea";
//import ideas from "./data/jar.json";

function App() {
  const [ideas, setIdeas] = useState([]);
  const [description, setDescription] = useState("");
  // eslint-disable-next-line no-unused-vars
  const [count, setCount] = useState(0);
  const [view, setView] = useState(false);
  const [text, setText] = useState("");

  // Try to get the jar.json file from the server
  axios.get("http://ideajar.paranom.asia/api/getjson.php").then(
    (response) => {
      setIdeas(response.data);
      setCount(response.data.length);
      //console.log("count= " + count);
    },
    (error) => {
      console.log(error);
    }
  );
  //const [loading, setLoading] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    if (description.length < 1) null;
    else {
      //setLoading(true);
      // Add new idea to JSON file 'jar.json'
      const idea_obj = {
        description: description,
      };
      ideas.push(idea_obj);
      // Try to send the jar.json file to the server
      axios.post("http://ideajar.paranom.asia/api/postjson.php", ideas);
      setCount(ideas.length);
      setDescription("");
      //setLoading(false);
    }
  };

  // RENDER
  if (view) return <ViewIdea text={text} setView={setView} />;
  else
    return (
      <>
        <div>
          <h1>IDEAS JAR</h1>
          <form onSubmit={handleSubmit}>
            <label className="form">Enter your idea:&nbsp;&nbsp;</label>
            <input
              type="text"
              maxLength={128}
              value={description}
              onChange={(e) => setDescription(e.target.value)}
            />
            &nbsp;&nbsp;
            <input type="submit" value="Go!" />
          </form>
        </div>
        <ListIdeas
          ideas={ideas}
          view={view}
          setView={setView}
          text={text}
          setText={setText}
        />
      </>
    );
  /*if (loading)
    return (
      <div className="loading">
        <h1>Loading...</h1>
        <Circles
          height="80"
          width="80"
          color="#4fa94d"
          ariaLabel="circles-loading"
          wrapperStyle={{}}
          wrapperClass=""
          visible={true}
        />
      </div>
    );*/
}
export default App;
