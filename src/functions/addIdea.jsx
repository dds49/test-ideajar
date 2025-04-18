import * as fs from "fs";
import data from "../data/jar.json";
console.log(data);
const addIdea = () => {
  const data = fs.readFile("Jar.json", "utf8");
  const jsonData = JSON.parse(data);
  data.push({
    description: "This is my new idea!",

    // or any other data we want to add in that object
  });
  fs.writeFile("data.json", JSON.stringify(jsonData));
  console.log(data);
};
export default addIdea;
