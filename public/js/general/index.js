import './authentication.js';
import './select.js';
import './inputQuantity.js';
import './search.js';
import './cart.js';

// To reusable
export * from './notification.js';

export function getValue(val) {
    let parseNum = parseInt(val.replace(/\s\s+/g, ' '), 10);
    return parseNum;
}
// Module luôn ở strict mode, không khai báo let var là không export được
// import thẳng tên là chỉ có từ export default
// import rỗng thì chỉ thực thi file đó
// import alias hoặc trong {} thì là từ export thông Thường

// export từ một file khác tức là câu lệnh viết tắt của import sau đó export
// Nếu export thông thường trong {} thì phải chỉ định rõ tên khi import