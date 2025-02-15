using System;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace ABC_Car_Traders
{
    public partial class Form10 : Form
    {
        private string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

        public Form10()
        {
            InitializeComponent();
            LoadDefaultIds();
        }

        private void Form10_Load(object sender, EventArgs e)
        {
            // Set the OrderStatus to "Pending" by default
            txtOrderStatus.Text = "Pending";
        }

        private void LoadDefaultIds()
        {
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                connection.Open();

                // Get the next OrderID
                string orderIdQuery = "SELECT ISNULL(MAX(OrderID), 1000) + 1 FROM orderdetails";
                using (SqlCommand command = new SqlCommand(orderIdQuery, connection))
                {
                    int nextOrderId = (int)command.ExecuteScalar();
                    txtOrderID.Text = nextOrderId.ToString();
                }

                // Get the next CustomerID
                string customerIdQuery = "SELECT ISNULL(MAX(CustomerID), 0) + 1 FROM customers";
                using (SqlCommand command = new SqlCommand(customerIdQuery, connection))
                {
                    int nextCustomerId = (int)command.ExecuteScalar();
                    txtCustomerID.Text = nextCustomerId.ToString();
                }

                connection.Close();
            }
        }

        private void btnSubmitOrder_Click(object sender, EventArgs e)
        {
            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                string query = "INSERT INTO orderdetails (OrderID, CustomerID, OrderDate, OrderStatus, TotalAmount, ItemName) VALUES (@OrderID, @CustomerID, @OrderDate, @OrderStatus, @TotalAmount, @ItemName)";

                using (SqlCommand command = new SqlCommand(query, connection))
                {
                    command.Parameters.AddWithValue("@OrderID", txtOrderID.Text);
                    command.Parameters.AddWithValue("@CustomerID", txtCustomerID.Text);
                    command.Parameters.AddWithValue("@OrderDate", txtOrderDate.Text);
                    command.Parameters.AddWithValue("@OrderStatus", txtOrderStatus.Text);
                    command.Parameters.AddWithValue("@TotalAmount", txtTotalAmount.Text);
                    command.Parameters.AddWithValue("@ItemName", txtItemName.Text);

                    try
                    {
                        connection.Open();
                        command.ExecuteNonQuery();
                        MessageBox.Show("Order has been successfully placed. Please remember your Order ID", "Success", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        LoadDefaultIds(); // Update IDs after successful submission
                    }
                    catch (Exception ex)
                    {
                        MessageBox.Show($"An error occurred: {ex.Message}", "Error", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
            }
        }

        private void lblOrderID_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form9 form9 = new Form9();

            this.Hide();

            form9.Show();
        }
    }
}
