import i18n from "../lang";

export const getAvatar = (avatarUrl = null) => {
  if (avatarUrl !== null) {
    return avatarUrl;
  } else {
    return "assets/images/avatar/default-avatar.png";
  }
};

export const removeVietnameseFromString = str => {
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
  str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
  str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
  str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
  str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
  str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
  str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
  str = str.replace(/Đ/g, "D");
  str = str.toLowerCase();
  str = str
    .replace(/[&]/g, "-and-")
    .replace(/[^a-zA-Z0-9._-]/g, "-")
    .replace(/[-]+/g, "-")
    .replace(/-$/, "");
  return str;
};

export const filterProjectStatus = (statusConfig, status) => {
  let result;
  statusConfig.filter(item => {
    if (item.value.replace(" ", "_") === status) result = item;
  });
  return result;
};

export const masks = () => {
  if (i18n.locale === "vi") return { input: "DD/MM/YYYY" };
  if (i18n.locale === "ja") return { input: "YYYY/MM/DD" };
};

export const message = (type, text) => {
  return {
    group: "notify",
    type,
    text
  };
};

export const flatten = array => {
  return array.reduce(function recur(accumulator, curr) {
    var keys = Object.keys(curr);
    keys.splice(keys.indexOf("children"), 1);

    accumulator.push(
      keys.reduce(function(entry, key) {
        entry[key] = curr[key];
        return entry;
      }, {})
    );
    if (curr.children.length) {
      return accumulator.concat(curr.children.reduce(recur, []));
    }
    return accumulator;
  }, []);
};

