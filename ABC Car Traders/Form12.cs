using System;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form12 : Form
    {
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form12()
        {
            InitializeComponent();
        }

        private void Form12_Load(object sender, EventArgs e)
        {
            LoadDataIntoGrid(); // Load data when the form is first loaded
        }

        public void LoadDataIntoGrid() // Changed from private to public
        {
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                string query = "SELECT * FROM orderdetails";
                SqlDataAdapter adapter = new SqlDataAdapter(query, connection);
                DataTable dataTable = new DataTable();
                try
                {
                    adapter.Fill(dataTable);
                    dataGridView1.DataSource = dataTable;
                }
                catch (Exception ex)
                {
                    MessageBox.Show($"An error occurred: {ex.Message}", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
        }

        private void btnRefresh_Click(object sender, EventArgs e)
        {
            LoadDataIntoGrid(); // Reload the data into the grid
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {
            // Additional paint logic if needed
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form3 form3 = new Form3();

            this.Hide();

            form3.Show();
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }
    }
}
