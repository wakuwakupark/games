package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.List;


/**
 * The persistent class for the notifies database table.
 * 
 */
@Entity
@Table(name="notifies")
@NamedQuery(name="Notify.findAll", query="SELECT n FROM Notify n")
public class Notify implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	private String name;

	//bi-directional many-to-one association to Wait
	@OneToMany(mappedBy="notify", cascade=CascadeType.ALL)
	private List<Wait> waits;

	public Notify() {
	}

	public Integer getId() {
		return this.id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getName() {
		return this.name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public List<Wait> getWaits() {
		return this.waits;
	}

	public void setWaits(List<Wait> waits) {
		this.waits = waits;
	}

	public Wait addWait(Wait wait) {
		getWaits().add(wait);
		wait.setNotify(this);

		return wait;
	}

	public Wait removeWait(Wait wait) {
		getWaits().remove(wait);
		wait.setNotify(null);

		return wait;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((id == null) ? 0 : id.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Notify other = (Notify) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}

}