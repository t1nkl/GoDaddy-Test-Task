import React, { useEffect, useState } from 'react';
import BookTable from '../components/BookTable';

const Dashboard = () => {
  const [books, setBooks] = useState([]);
  const [bookCount, setBookCount] = useState(null);

  useEffect(() => {
    fetch('/api/v1/books')
    .then(response => response.json())
    .then(data => {
      setBooks(data);
      setBookCount(data.length);
    });
  }, []);

  return (
    <div>
      <h1>Book Library Dashboard</h1>
      <p>Number of books in library: {bookCount}</p>

      <BookTable books={books} />
    </div>
  );
};

export default Dashboard;
