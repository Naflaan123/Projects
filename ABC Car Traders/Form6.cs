using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form6 : Form
    {
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form6()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {
            // You can add functionality here if needed
        }

        private void label2_Click(object sender, EventArgs e)
        {
            // You can add functionality here if needed
        }

        private void label3_Click(object sender, EventArgs e)
        {
            // You can add functionality here if needed
        }

        private void search_box_TextChanged(object sender, EventArgs e)
        {
            // Fetch customer details whenever the text in the search box changes
            string customerID = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(customerID))
            {
                FetchCustomerDetails(customerID);
            }
            else
            {
                ClearPanel2(); // Clear the fields if the search box is empty
            }
        }

        private void FetchCustomerDetails(string customerID)
        {
            string query = "SELECT * FROM customers WHERE CustomerID = @CustomerID";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@CustomerID", customerID);

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.Read())
                    {
                        // Populate the fields with data from the database
                        textBox1.Text = reader["CustomerID"].ToString();
                        textBox2.Text = reader["FirstName"].ToString();
                        textBox3.Text = reader["LastName"].ToString();
                        textBox4.Text = reader["Email"].ToString();
                        textBox5.Text = reader["PhoneNumber"].ToString();
                        textBox6.Text = reader["Address"].ToString();
                        textBox7.Text = reader["City"].ToString();
                        textBox8.Text = reader["RegistrationDate"].ToString();
                    }
                    else
                    {
                        // Clear the fields if no data found
                        ClearPanel2();
                    }

                    reader.Close(); // Ensure reader is closed
                }
                catch (SqlException sqlEx)
                {
                    MessageBox.Show("A SQL error occurred: " + sqlEx.Message);
                }
                catch (Exception ex)
                {
                    MessageBox.Show("An error occurred: " + ex.Message);
                }
            }
        }

        private void ClearPanel2()
        {
            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
            textBox4.Clear();
            textBox5.Clear();
            textBox6.Clear();
            textBox7.Clear();
            textBox8.Clear();
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            // Call the method to update the customer details in the database
            string customerID = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(customerID))
            {
                UpdateCustomerDetails(customerID);
            }
            else
            {
                MessageBox.Show("Please enter a customer ID to edit.");
            }
        }

        private void UpdateCustomerDetails(string customerID)
        {
            string query = "UPDATE customers SET FirstName = @FirstName, LastName = @LastName, Email = @Email, PhoneNumber = @PhoneNumber, Address = @Address, City = @City, RegistrationDate = @RegistrationDate WHERE CustomerID = @CustomerID";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@CustomerID", customerID);
                command.Parameters.AddWithValue("@FirstName", textBox2.Text);
                command.Parameters.AddWithValue("@LastName", textBox3.Text);
                command.Parameters.AddWithValue("@Email", textBox4.Text);
                command.Parameters.AddWithValue("@PhoneNumber", textBox5.Text);
                command.Parameters.AddWithValue("@Address", textBox6.Text);
                command.Parameters.AddWithValue("@City", textBox7.Text);
                command.Parameters.AddWithValue("@RegistrationDate", textBox8.Text);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Customer details updated successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No customer details were updated. Please check the customer ID.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
                catch (SqlException sqlEx)
                {
                    MessageBox.Show("A SQL error occurred: " + sqlEx.Message);
                }
                catch (Exception ex)
                {
                    MessageBox.Show("An error occurred: " + ex.Message);
                }
            }
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            // Call the method to add new customer details to the database
            AddCustomerDetails();
        }

        private void AddCustomerDetails()
        {
            string query = "INSERT INTO customers (CustomerID, FirstName, LastName, Email, PhoneNumber, Address, City, RegistrationDate) VALUES (@CustomerID, @FirstName, @LastName, @Email, @PhoneNumber, @Address, @City, @RegistrationDate)";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@CustomerID", textBox1.Text);
                command.Parameters.AddWithValue("@FirstName", textBox2.Text);
                command.Parameters.AddWithValue("@LastName", textBox3.Text);
                command.Parameters.AddWithValue("@Email", textBox4.Text);
                command.Parameters.AddWithValue("@PhoneNumber", textBox5.Text);
                command.Parameters.AddWithValue("@Address", textBox6.Text);
                command.Parameters.AddWithValue("@City", textBox7.Text);
                command.Parameters.AddWithValue("@RegistrationDate", textBox8.Text);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Customer details added successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No customer details were added.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
                catch (SqlException sqlEx)
                {
                    MessageBox.Show("A SQL error occurred: " + sqlEx.Message);
                }
                catch (Exception ex)
                {
                    MessageBox.Show("An error occurred: " + ex.Message);
                }
            }
        }

        private void delete_button_Click(object sender, EventArgs e)
        {
            // Check if the search box is not empty
            if (string.IsNullOrWhiteSpace(search_box.Text))
            {
                MessageBox.Show("Please enter a Customer ID to search for.");
                return;
            }

            string customerId = search_box.Text;

            // Create the SQL query for deletion
            string query = "DELETE FROM customers WHERE CustomerID = @CustomerID";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@CustomerID", customerId);

                try
                {
                    connection.Open();
                    int result = command.ExecuteNonQuery();

                    // Check if any rows were affected
                    if (result > 0)
                    {
                        MessageBox.Show("Customer record deleted successfully.");
                        ClearPanel2(); // Clear form fields after deletion
                    }
                    else
                    {
                        MessageBox.Show("No record found with the provided Customer ID.");
                    }
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Error: " + ex.Message);
                }
            }
        }

        private void panel2_Paint(object sender, PaintEventArgs e)
        {
            // You can add functionality here if needed
        }

        private void label5_Click(object sender, EventArgs e)
        {
            // You can add functionality here if needed
        }

        private void label10_Click(object sender, EventArgs e)
        {
            // You can add functionality here if needed
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();

            this.Hide();

            form3.Show();
        }
    }
}
