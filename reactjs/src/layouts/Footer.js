import React from 'react'

const Footer = () => {
  return (
    <div>
    <footer className="py-4 bg-light mt-auto">
    <div className="container-fluid px-4">
        <div className="d-flex align-items-center justify-content-between small">
            <div className="text-muted">Copyright &copy; Your Website 2024</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
  )
}

export default Footer