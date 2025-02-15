using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form5 : Form
    {
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form5()
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
            // Fetch car part details whenever the text in the search box changes
            string partID = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(partID))
            {
                FetchPartDetails(partID);
            }
            else
            {
                ClearPanel2(); // Clear the fields if the search box is empty
            }
        }

        private void FetchPartDetails(string partID)
        {
            string query = "SELECT * FROM carparts WHERE PartID = @PartID";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@PartID", partID);

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.Read())
                    {
                        // Populate the fields with data from the database
                        textBox1.Text = reader["PartID"].ToString();
                        textBox2.Text = reader["PartName"].ToString();
                        textBox3.Text = reader["PartNumber"].ToString();
                        textBox4.Text = reader["Price"].ToString();
                        textBox5.Text = reader["QuantityInStock"].ToString();
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
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            // Call the method to update the car part details in the database
            string partID = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(partID))
            {
                UpdatePartDetails(partID);
            }
            else
            {
                MessageBox.Show("Please enter a part ID to edit.");
            }
        }

        private void UpdatePartDetails(string partID)
        {
            string query = "UPDATE carparts SET PartName = @PartName, PartNumber = @PartNumber, Price = @Price, QuantityInStock = @QuantityInStock WHERE PartID = @PartID";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@PartID", partID);
                command.Parameters.AddWithValue("@PartName", textBox2.Text);
                command.Parameters.AddWithValue("@PartNumber", textBox3.Text);
                command.Parameters.AddWithValue("@Price", textBox4.Text);
                command.Parameters.AddWithValue("@QuantityInStock", textBox5.Text);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Car part details updated successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No car part details were updated. Please check the part ID.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
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
            // Call the method to add new car part details to the database
            AddPartDetails();
        }

        private void AddPartDetails()
        {
            string query = "INSERT INTO carparts (PartID, PartName, PartNumber, Price, QuantityInStock) VALUES (@PartID, @PartName, @PartNumber, @Price, @QuantityInStock)";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@PartID", textBox1.Text);
                command.Parameters.AddWithValue("@PartName", textBox2.Text);
                command.Parameters.AddWithValue("@PartNumber", textBox3.Text);
                command.Parameters.AddWithValue("@Price", textBox4.Text);
                command.Parameters.AddWithValue("@QuantityInStock", textBox5.Text);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Car part details added successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No car part details were added.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
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
            // Call the method to delete the car part details from the database
            string partID = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(partID))
            {
                DeletePartDetails(partID);
            }
            else
            {
                MessageBox.Show("Please enter a part ID to delete.");
            }
        }

        private void DeletePartDetails(string partID)
        {
            string query = "DELETE FROM carparts WHERE PartID = @PartID";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@PartID", partID);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Car part details deleted successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        ClearPanel2(); // Clear the fields after deletion
                    }
                    else
                    {
                        MessageBox.Show("No car part details were deleted. Please check the part ID.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
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

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();

            this.Hide();

            form3.Show();
        }

        private void search_button_Click(object sender, EventArgs e)
        {

        }
    }
}
