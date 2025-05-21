//import { motion } from "framer-motion";
import { useState } from "react";

const ListIdeas = ({ ideas }) => {
  const count = ideas.length;
  const initToggle = [];
  for (let i = 0; i < count; i++) {
    initToggle[i] = false;
  }
  const [toggle, setToggle] = useState(initToggle);

  const clicked = (index) => {
    setToggle((prevToggle) => {
      const newToggle = [...prevToggle];
      newToggle[index] = !newToggle[index];
      return newToggle;
    });
  };
  //console.log(toggle);

  //  RENDER

  return (
    <>
      <div>
        <>
          {count == 0 && (
            <div>
              <h2 style={{ fontWeight: 400 }}>The Jar is empty!</h2>
            </div>
          )}
          {count == 1 && (
            <div>
              <h2 style={{ fontWeight: 400 }}>
                There's only 1 idea in the Jar
              </h2>
            </div>
          )}
          {count > 1 && (
            <div>
              <h2 style={{ fontWeight: 400 }}>
                There are {count} ideas in the Jar
              </h2>
            </div>
          )}

          {ideas.map((idea, index) => (
            <div className="idea" key={index}>
              {toggle[index] && (
                <button className="idea-btn" onClick={() => clicked(index)}>
                  {idea.description}
                </button>
              )}
              {!toggle[index] && (
                <button
                  className="idea-btn-transparent"
                  onClick={() => clicked(index)}
                >
                  {idea.description}
                </button>
              )}
            </div>
          ))}
        </>
      </div>
    </>
  );
};
export default ListIdeas;
