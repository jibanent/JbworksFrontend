const array = [
  {
    id: 1,
    name: "Level 1",
    children: [
      {
        id: 3,
        name: "Level 1.1",
        parent_id: 1
        children: [
          {
            id: 5,
            name: "Level 1.1.1",
            parent_id: 3,
            children: []
          },
           {
            id: 6,
            name: "Level 1.1.2",
            parent_id: 3,
            children: []
          },
          //{ Push item vào vị trí này (array[0].children[0].id === item.parent_id)}
        ]
      },
      {
        id: 4,
        name: "Level 1.2",
        parent_id: 1,
        children: []
      }
    ]
  },
  {
    id: 2,
    name: "Level 2",
    children: []
  }
];

const item = {
  id: 7,
  name: 'Level 1.1.3',
  parent_id: 3,
  children: []
}

const tree = [{"id":1,"name":"Level 1","parent_id":null,"children":[{"id":3,"name":"Level 1.1","parent_id":1,"children":[{"id":5,"name":"Level 1.1.1","parent_id":3,"children":[]},{"id":6,"name":"Level 1.1.2","parent_id":3,"children":[]}]},{"id":4,"name":"Child 1.2","parent_id":1,"children":[]}]},{"id":2,"name":"Level 2","parent_id":null,"children":[{"id":8,"name":"Level 2.1","parent_id":2,"children":[{"id":9,"name":"Level 2.1.1","parent_id":8,"children":[]},{"id":10,"name":"Level 2.1.2","parent_id":8,"children":[]}]}]},{"id":11,"name":"Level 3","parent_id":null,"children":[{"id":12,"name":"Level 3.1","parent_id":11,"children":[]},{"id":13,"name":"Level 3.2","parent_id":11,"children":[]}]}];

const item = {
  "id": 7,
  "name": "Level 1.1.3",
  "parent_id": 3,
  "children": []
};

const findChild = (tree, id) => {
  for (const item of tree) {
      if (item.id == id) {
          return item;
      }
      if (item.children.length > 0) {
          const temp = findChild(item.children, id);
          if (temp) {
              return temp;
          }
      }
  }
  return null;
}

const parent = findChild(tree, item.parent_id);

if (parent) {
  parent.children.push(item);
}
console.log(tree);
