//import { motion } from "framer-motion";
//import { useState } from "react";
//import axios from "axios";
//import ideas from "../data/jar.json";
import ViewIdea from "./ViewIdea";

const ListIdeas = ({ ideas, view, setView, text, setText }) => {
  //const [count, setCount] = useState(0);
  //const [ideas, setIdeas] = useState([]);
  // Try to get the jar.json file from the server
  /*axios.get("http://ideajar.paranom.asia/api/v6/getjson.php").then(
    (response) => {
      setIdeas(response.data);
      setCount(ideas.length);
      //console.log(response.data);
    },
    (error) => {
      console.log(error);
    }
  );*/
  const count = ideas.length;
  const handleClick = (idea) => () => {
    setView(true);
    setText(idea.description);
    //console.log("text = " + idea.description);
  };

  if (!view) {
    return (
      <>
        <div>
          <>
            <div>
              <h2 style={{ fontWeight: 400 }}>
                There are {count} ideas in the Jar
              </h2>
            </div>
            {ideas.map((idea, key) => (
              <div className="idea" key={key}>
                <button className="question-btn" onClick={handleClick(idea)}>
                  ?
                </button>
              </div>
            ))}
          </>
        </div>
      </>
    );
  } else return <ViewIdea text={text} setView={setView} />;
};
export default ListIdeas;
