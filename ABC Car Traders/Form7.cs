using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form7 : Form
    {
        // Connection string to your database
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form7()
        {
            InitializeComponent();
        }

        private void btn_regi_Click(object sender, EventArgs e)
        {
            // Get values from text boxes
            string customerId = textBox3.Text; // Add this line to get the CustomerID
            string firstName = textBox1.Text;
            string lastName = textBox4.Text;
            string email = textBox5.Text;
            string phone = textBox2.Text;
            string address = textBox6.Text;
            string city = textBox7.Text;
            string registrationDate = textBox8.Text;
            string username = textBox9.Text;
            string password = textBox10.Text;

            // Validate inputs
            if (string.IsNullOrEmpty(customerId) || string.IsNullOrEmpty(firstName) || string.IsNullOrEmpty(lastName) ||
                string.IsNullOrEmpty(email) || string.IsNullOrEmpty(phone) || string.IsNullOrEmpty(address) ||
                string.IsNullOrEmpty(city) || string.IsNullOrEmpty(registrationDate) || string.IsNullOrEmpty(username) ||
                string.IsNullOrEmpty(password))
            {
                MessageBox.Show("Please fill in all fields.");
                return;
            }

            // SQL query to insert customer details
            string query = "INSERT INTO customers (CustomerID, FirstName, LastName, Email, PhoneNumber, Address, City, RegistrationDate, Username, Password) " +
                           "VALUES (@CustomerID, @FirstName, @LastName, @Email, @PhoneNumber, @Address, @City, @RegistrationDate, @Username, @Password)";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);

                // Add parameters to prevent SQL injection
                command.Parameters.AddWithValue("@CustomerID", customerId);
                command.Parameters.AddWithValue("@FirstName", firstName);
                command.Parameters.AddWithValue("@LastName", lastName);
                command.Parameters.AddWithValue("@Email", email);
                command.Parameters.AddWithValue("@PhoneNumber", phone);
                command.Parameters.AddWithValue("@Address", address);
                command.Parameters.AddWithValue("@City", city);
                command.Parameters.AddWithValue("@RegistrationDate", registrationDate);
                command.Parameters.AddWithValue("@Username", username);
                command.Parameters.AddWithValue("@Password", password); // Note: Consider hashing the password before storing it

                try
                {
                    connection.Open();
                    command.ExecuteNonQuery();
                    MessageBox.Show("Registration successful!");
                }
                catch (Exception ex)
                {
                    MessageBox.Show("An error occurred: " + ex.Message);
                }
            }
        }


        private void label2_Click(object sender, EventArgs e)
        {
            // Handle label2 click event if needed
        }

        private void btn_move_Click(object sender, EventArgs e)
        {
            // Create an instance of Form8
            Form8 form8 = new Form8();

            // Hide the current form (the form where the btn_move button is located)
            this.Hide();

            // Show Form8
            form8.Show();
        }
    }
}
