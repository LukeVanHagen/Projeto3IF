package org.exemplo.persistencia.database.dao;

import java.util.List;

import javax.persistence.criteria.CriteriaBuilder;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;

import org.exemplo.persistencia.database.db.IConnection;
import org.exemplo.persistencia.database.model.Conta;
import org.hibernate.query.Query;
import org.exemplo.persistencia.database.model.Cliente;
import org.hibernate.Session;

import com.mysql.cj.xdevapi.SessionFactory;

public class ClienteDAO implements IEntityDAO<Cliente> {

	private IConnection conn;
	
	public ClienteDAO(IConnection conn) {
		this.conn = conn;
	}
	
	public void save(Cliente cliente) {
		Session session = conn.getSessionFactory().openSession();
		session.beginTransaction();
		session.persist(cliente);
		session.getTransaction().commit();
		session.close();
	}
	
	public void delete(Cliente cliente) {
		Session session = conn.getSessionFactory().openSession();
		session.beginTransaction();
		session.delete(cliente);
		session.getTransaction().commit();
		session.close();
	}
	
	public void update(Cliente cliente) {
		Session session = conn.getSessionFactory().openSession();
		session.beginTransaction();
		session.merge(cliente);
		session.getTransaction().commit();
		session.close();
	}
	
	public Cliente findById(Integer id) {
		Session session = conn.getSessionFactory().openSession();
		Cliente cliente = session.find(Cliente.class, id);
		session.close();
		return cliente;
	}

	@Override
	public List<Cliente> findAll() {
		Session session = conn.getSessionFactory().openSession();
		CriteriaBuilder builder = session.getCriteriaBuilder();
        CriteriaQuery<Cliente> query = builder.createQuery(Cliente.class);
        Root<Cliente> root = query.from(Cliente.class);
        query.select(root);
        List<Cliente> clientes = session.createQuery(query).getResultList();
        session.close();
        return clientes;
	}

	@Override
	public Cliente findByCpf(String cpf) {
        try (Session session = conn.getSessionFactory().openSession()) {
            String hql = "FROM Cliente c JOIN FETCH c.contas WHERE c.cpf = :cpf";
            Query<Cliente> query = session.createQuery(hql, Cliente.class);
            query.setParameter("cpf", cpf);
            return query.uniqueResult();
        } catch (Exception e) {
            System.out.println("Ocorreu um erro ao buscar o cliente por CPF: " + e.getMessage());
            e.printStackTrace();
            return null;
        }
    }}