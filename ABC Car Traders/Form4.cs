using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form4 : Form
    {
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form4()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e) { }
        private void label2_Click(object sender, EventArgs e) { }
        private void label3_Click(object sender, EventArgs e) { }

        private void search_box_TextChanged(object sender, EventArgs e)
        {
            string registrationNo = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(registrationNo))
            {
                FetchCarDetails(registrationNo);
            }
            else
            {
                ClearPanel2();
            }
        }

        private void FetchCarDetails(string registrationNo)
        {
            string query = "SELECT * FROM cardetails WHERE RegistrationNo = @RegistrationNo";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@RegistrationNo", registrationNo);

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.Read())
                    {
                        textBox1.Text = reader["RegistrationNo"].ToString();
                        textBox2.Text = reader["Model"].ToString();
                        textBox3.Text = reader["ModelNo"].ToString();
                        textBox4.Text = reader["Colour"].ToString();
                        textBox5.Text = reader["Country"].ToString();
                        textBox6.Text = reader["Price"].ToString();
                    }
                    else
                    {
                        ClearPanel2();
                    }

                    reader.Close();
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
        }

        private void btnEdit_Click(object sender, EventArgs e)
        {
            string registrationNo = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(registrationNo))
            {
                UpdateCarDetails(registrationNo);
            }
            else
            {
                MessageBox.Show("Please enter a registration number to edit.");
            }
        }

        private void UpdateCarDetails(string registrationNo)
        {
            string query = "UPDATE cardetails SET Model = @Model, ModelNo = @ModelNo, Colour = @Colour, Country = @Country, Price = @Price WHERE RegistrationNo = @RegistrationNo";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@RegistrationNo", registrationNo);
                command.Parameters.AddWithValue("@Model", textBox2.Text);
                command.Parameters.AddWithValue("@ModelNo", textBox3.Text);
                command.Parameters.AddWithValue("@Colour", textBox4.Text);
                command.Parameters.AddWithValue("@Country", textBox5.Text);
                command.Parameters.AddWithValue("@Price", textBox6.Text);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Car details updated successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No car details were updated. Please check the registration number.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
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
            AddCarDetails();
        }

        private void AddCarDetails()
        {
            string query = "INSERT INTO cardetails (RegistrationNo, Model, ModelNo, Colour, Country, Price) VALUES (@RegistrationNo, @Model, @ModelNo, @Colour, @Country, @Price)";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@RegistrationNo", textBox1.Text);
                command.Parameters.AddWithValue("@Model", textBox2.Text);
                command.Parameters.AddWithValue("@ModelNo", textBox3.Text);
                command.Parameters.AddWithValue("@Colour", textBox4.Text);
                command.Parameters.AddWithValue("@Country", textBox5.Text);
                command.Parameters.AddWithValue("@Price", textBox6.Text);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Car details added successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                    }
                    else
                    {
                        MessageBox.Show("No car details were added.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
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
            string registrationNo = search_box.Text.Trim();
            if (!string.IsNullOrEmpty(registrationNo))
            {
                DeleteCarDetails(registrationNo);
            }
            else
            {
                MessageBox.Show("Please enter a registration number to delete.");
            }
        }

        private void DeleteCarDetails(string registrationNo)
        {
            string query = "DELETE FROM cardetails WHERE RegistrationNo = @RegistrationNo";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlCommand command = new SqlCommand(query, connection);
                command.Parameters.AddWithValue("@RegistrationNo", registrationNo);

                try
                {
                    connection.Open();
                    int rowsAffected = command.ExecuteNonQuery();

                    if (rowsAffected > 0)
                    {
                        MessageBox.Show("Car details deleted successfully.", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        ClearPanel2();
                    }
                    else
                    {
                        MessageBox.Show("No car details were deleted. Please check the registration number.", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
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

        private void button1_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();
            this.Hide();
            form3.Show();
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }
    }
}
