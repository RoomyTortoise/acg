const faunadb = require('faunadb');
const q = faunadb.query;
const client = new faunadb.Client({
  secret: process.env.FAUNADB_SECRET,
});

exports.handler = async function (event, context) {
  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, body: 'Method Not Allowed' };
  }

  const { name, email, message } = JSON.parse(event.body);

  try {
    await client.query(
      q.Create(q.Collection('contact_form_entries'), {
        data: { name, email, message }
      })
    );

    return { statusCode: 200, body: 'Message saved successfully' };
  } catch (error) {
    console.error('Error saving message:', error);
    return { statusCode: 500, body: 'Error saving message' };
  }
};
