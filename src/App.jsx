import { useState, useEffect } from "react";
import "./App.css";
import ListIdeas from "./components/ListIdeas";

function App() {
  const [text, setText] = useState("");

  const [jsonData, setJsonData] = useState(null);
  const [count, setCount] = useState(0);

  const getJsonData = async () => {
    const response = await fetch("./data/jar.json", {
      cache: "no-cache",
    });
    const data = await response.json();
    setCount(data.length);
    return data;
  };

  useEffect(() => {
    console.log(count);
    getJsonData().then((data) => {
      setJsonData(data);
    });
  }, [count]);

  if (jsonData === null) {
    return null;
  }

  function shuffle(array) {
    let currentIndex = array.length;

    // While there remain elements to shuffle...
    while (currentIndex != 0) {
      // Pick a remaining element...
      let randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex--;

      // And swap it with the current element.
      [array[currentIndex], array[randomIndex]] = [
        array[randomIndex],
        array[currentIndex],
      ];
    }
  }

  shuffle(jsonData);

  // RENDER

  return (
    <>
      <div>
        <h1>IDEAS JAR</h1>
      </div>
      <ListIdeas ideas={jsonData} text={text} setText={setText} />
    </>
  );
}
export default App;
