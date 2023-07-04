package org.exemplo.persistencia.database.dao;



import java.util.List;

import javax.persistence.criteria.CriteriaBuilder;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;

import org.exemplo.persistencia.database.db.IConnection;
import org.exemplo.persistencia.database.model.Transacao;
import org.hibernate.Session;

public class TransacaoDAO implements IEntityDAO<Transacao> {

	private IConnection conn;
	
	public TransacaoDAO(IConnection conn) {
		this.conn = conn;
	}
	
	public void save(Transacao transacao) {
		Session session = conn.getSessionFactory().openSession();
		session.beginTransaction();
		session.persist(transacao);
		session.getTransaction().commit();
		session.close();
	}
	
	public void delete(Transacao transacao) {
		Session session = conn.getSessionFactory().openSession();
		session.beginTransaction();
		session.delete(transacao);
		session.getTransaction().commit();
		session.close();
	}
	
	public void update(Transacao transacao) {
		Session session = conn.getSessionFactory().openSession();
		session.beginTransaction();
		session.merge(transacao);
		session.getTransaction().commit();
		session.close();
	}
	
	public Transacao findById(Integer id) {
		// TODO Auto-generated method stub
				return null;
	}

	@Override
	public List<Transacao> findAll() {
		Session session = conn.getSessionFactory().openSession();
		CriteriaBuilder builder = session.getCriteriaBuilder();
        CriteriaQuery<Transacao> query = builder.createQuery(Transacao.class);
        Root<Transacao> root = query.from(Transacao.class);
        query.select(root);
        List<Transacao> clientes = session.createQuery(query).getResultList();
        session.close();
        return clientes;
	}

	@Override
	public Transacao findByCpf(String cpf) {
		// TODO Auto-generated method stub
		return null;
	}
}