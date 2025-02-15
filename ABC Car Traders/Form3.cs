using System;
using System.Data;
using System.Data.SqlClient;
using System.IO;
using System.Windows.Forms;
using iText.Kernel.Pdf;
using iText.Layout;
using iText.Layout.Element;

namespace ABC_Car_Traders
{
    public partial class Form3 : Form
    {
        public Form3()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Form1 form1 = new Form1();

            this.Hide();

            form1.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            // Generate PDF report logic here
            GenerateReport();
        }

        private void GenerateReport()
        {
            // Assuming you have a DataTable named dt that contains your order details
            DataTable dt = GetOrderDetails(); // Replace with your actual data retrieval logic

            using (MemoryStream stream = new MemoryStream())
            {
                using (PdfWriter writer = new PdfWriter(stream))
                {
                    using (PdfDocument pdf = new PdfDocument(writer))
                    {
                        Document document = new Document(pdf);

                        // Add document title
                        document.Add(new Paragraph("Order Details Report")
                            .SetBold()
                            .SetFontSize(18));

                        // Create table with columns
                        Table table = new Table(dt.Columns.Count);

                        // Add headers
                        foreach (DataColumn column in dt.Columns)
                        {
                            table.AddHeaderCell(new Cell().Add(new Paragraph(column.ColumnName)));
                        }

                        // Add rows
                        foreach (DataRow row in dt.Rows)
                        {
                            foreach (var cell in row.ItemArray)
                            {
                                table.AddCell(new Cell().Add(new Paragraph(cell.ToString())));
                            }
                        }

                        document.Add(table);
                        document.Close();
                    }
                }

                // Define the file path with a specific directory
                string filePath = @"C:\Users\USER\Downloads\OrderDetailsReport.pdf";

                // Save the PDF to the specified file path
                File.WriteAllBytes(filePath, stream.ToArray());

                // Display the full path of the saved PDF
                MessageBox.Show($"PDF report generated at {filePath}");




            }
        }

        private DataTable GetOrderDetails()
        {
            DataTable dt = new DataTable();

            // Connection string to your database
            string connectionString = "Data Source=NAFLAAN\\SQLEXPRESS;Initial Catalog=loginapp;Integrated Security=True;TrustServerCertificate=True";

            // SQL query to fetch data from the orderdetails table
            string query = "SELECT OrderID, CustomerID, OrderDate, OrderStatus, TotalAmount FROM orderdetails";

            using (SqlConnection connection = new SqlConnection(connectionString))
            {
                SqlDataAdapter adapter = new SqlDataAdapter(query, connection);
                adapter.Fill(dt);
            }

            return dt;
        }

        private void label3_Click(object sender, EventArgs e)
        {
            Form12 form12 = new Form12();

            this.Hide();

            form12.Show();
        }

        private void order_details_Click(object sender, EventArgs e)
        {
            Form13 form13 = new Form13();

            this.Hide();

            form13.Show();
        }

        private void customer_details_Click(object sender, EventArgs e)
        {
            // Create an instance of Form6
            Form6 form6 = new Form6();

            // Hide the current form (Form3)
            this.Hide();

            // Show Form6
            form6.Show();
        }

        private void parts_details_Click(object sender, EventArgs e)
        {
            // Create an instance of Form5
            Form5 form5 = new Form5();

            // Hide the current form (Form3)
            this.Hide();

            // Show Form5
            form5.Show();
        }

        private void label2_Click(object sender, EventArgs e)
        {
            // Create an instance of Form4
            Form4 form4 = new Form4();

            // Hide the current form (Form3)
            this.Hide();

            // Show Form4
            form4.Show();
        }
    }
}
