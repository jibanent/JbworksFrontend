// const renderDepartments = state => {
//   // const { data } = state.departments;
//   // if (data) {
//   //   const topLevel = data.filter(node => !node.parent_id);
//   //   var arr = [];
//   //   topLevel.map(each => {
//   //     each.children = traverse(data, each.id);
//   //     arr.push(each);
//   //   });
//   //   return arr
//   // }
// };

// function traverse(data, parentId) {

//   const children = data.filter(each => each.parent_id === parentId);
//   children.forEach(child => {
//     child.children = traverse(data, child.id);
//   });
//   return children;
// }

// export default {
//   renderDepartments,
//   traverse
// };
