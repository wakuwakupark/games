package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.List;


/**
 * The persistent class for the court_types database table.
 * 
 */
@Entity
@Table(name="court_types")
@NamedQueries({
	@NamedQuery(name="CourtType.findAll", query="SELECT c FROM CourtType c"),
	@NamedQuery(name="CourtType.findByName", query="SELECT c FROM CourtType c WHERE c.name = :name")
})
public class CourtType implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	private String name;

	//bi-directional many-to-one association to Court
	@OneToMany(mappedBy="courtType", cascade=CascadeType.ALL)
	private List<Court> courts;

	public CourtType() {
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

	public List<Court> getCourts() {
		return this.courts;
	}

	public void setCourts(List<Court> courts) {
		this.courts = courts;
	}

	public Court addCourt(Court court) {
		getCourts().add(court);
		court.setCourtType(this);

		return court;
	}

	public Court removeCourt(Court court) {
		getCourts().remove(court);
		court.setCourtType(null);

		return court;
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
		CourtType other = (CourtType) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}	
}