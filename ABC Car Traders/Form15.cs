using System;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form15 : Form
    {
        // Your SQL Server connection string
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form15()
        {
            InitializeComponent();
        }

        // Event handler for the Search button
        private void btnSearch_Click(object sender, EventArgs e)
        {
            try
            {
                using (SqlConnection connection = new SqlConnection(connectionString))
                {
                    connection.Open();
                    string query = "SELECT PartID, PartName, PartNumber, Price, QuantityInStock FROM carparts"; // Adjust query as per your table structure
                    SqlDataAdapter adapter = new SqlDataAdapter(query, connection);
                    DataTable dataTable = new DataTable();
                    adapter.Fill(dataTable);

                    // Bind the DataTable to the DataGridView
                    dataGridView1.DataSource = dataTable;
                }
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
        }

        private void Form15_Load(object sender, EventArgs e)
        {
            // You can load any data on form load here if needed
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form9 form9 = new Form9();

            this.Hide();

            form9.Show();
        }
    }
}
