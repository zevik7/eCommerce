import './authentication.js';
import './select.js';
import './inputQuantity.js';
import './search.js';

// To reusable
export * from './notification.js';

// Module luôn ở strict mode, không khai báo let var là không export được dkm
// import thẳng tên là chỉ có từ export default
// import rỗng thì chỉ thực thi file đó
// import alias hoặc trong {} thì là từ export thông Thường

// export từ một file khác tức là câu lệnh viết tắt của import sau đó export
// Nếu export thông thường trong {} thì phải chỉ định rõ tên khi import