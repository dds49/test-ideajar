import { FaTimes } from "react-icons/fa";

const ViewIdea = ({ text, setView }) => {
  return (
    <>
      <div className="idea-view">
        <>
          <h3 style={{ fontWeight: 400 }}>
            {text}
            <br />
            <br />
            <div className="center-div">
              <button className="back-btn" onClick={() => setView(false)}>
                {" "}
                Back{" "}
              </button>
            </div>
            <br />
          </h3>
        </>
      </div>
    </>
  );
};
export default ViewIdea;
