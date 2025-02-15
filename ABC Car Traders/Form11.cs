using System;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form11 : Form
    {
        public Form11()
        {
            InitializeComponent();
        }

        private void btnSearch_Click(object sender, EventArgs e)
        {
            string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";
            string query = "SELECT Model, Price, Colour FROM cardetails WHERE Country = @Country";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@Country", txtCountry.Text);

                    SqlDataAdapter adapter = new SqlDataAdapter(command);
                    DataTable dataTable = new DataTable();
                    try
                    {
                        connection.Open();
                        adapter.Fill(dataTable);
                        dataGridView1.DataSource = dataTable;
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show($"An error occurred: {ex.Message}", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            // Handle any specific action if needed.
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form9 form9 = new Form9();

            this.Hide();

            form9.Show();
        }
    }
}
