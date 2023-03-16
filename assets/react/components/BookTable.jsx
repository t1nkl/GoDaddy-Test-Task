import React from 'react';

function BookTable({ books }) {
  return (
    <table>
      <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Publisher</th>
        <th>Publication Date</th>
        <th>Word Count</th>
        <th>Price</th>
      </tr>
      </thead>
      <tbody>
      {books.map((book) => (
        <tr key={book.id}>
          <td>{book.title}</td>
          <td>{book.author}</td>
          <td>{book.genre}</td>
          <td>{book.publisher}</td>
          <td>{book.publication_date}</td>
          <td>{book.word_count}</td>
          <td>{book.price}</td>
        </tr>
      ))}
      </tbody>
    </table>
  );
}

export default BookTable;
